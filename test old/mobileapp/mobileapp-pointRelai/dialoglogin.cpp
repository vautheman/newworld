#include "dialoglogin.h"
#include "ui_dialoglogin.h"
#include <QUrl>
#include <QDebug>
#include <QtNetwork>

DialogLogin::DialogLogin(QWidget *parent) :
    QDialog(parent),
    ui(new Ui::DialogLogin)
{
    ui->setupUi(this);
    // espace pour les sessions
    myNWM.setCookieJar(&cookieJar);
}

DialogLogin::~DialogLogin()
{
    delete ui;
}


void DialogLogin::on_pushButton_connect_clicked()
{
    // verification du user et du password
    QUrl serviceUrl("http://127.0.0.1/newworld/mobileapp/assets/json/jsonLogin.php");
    QUrl donnees;
    QUrlQuery query;

    // Ajout de $_POST['login'] et de $_POST['password']
    query.addQueryItem("login", ui->lineEdit_user->text());
    query.addQueryItem("password", ui->lineEdit_pwd->text());
    donnees.setQuery(query);

    QByteArray postData(donnees.toString(QUrl::RemoveFragment).remove("?").toLatin1());

    //création de la requête http qui va interroger le service
    QNetworkRequest request(serviceUrl);
    request.setHeader(QNetworkRequest::ContentTypeHeader, "application/x-www-form-urlencoded");

    // Execution de la requête http
    QNetworkReply *reply1 = myNWM.post(request,postData);

    // Attente de la réception complète de la réponse
    while(!reply1->isFinished())
    {
        qApp->processEvents();
    }

    // Lecture de la réponse
    QByteArray response_data = reply1->readAll();

    // Affichage pour débbuger
    qDebug()<<response_data;


    // Formation du json à partir de la réponse
    QJsonDocument jsonResponse = QJsonDocument::fromJson(response_data);

    // Un peu de débogage
    qDebug()<<jsonResponse.object();
    qDebug()<<jsonResponse.object().count();

    // On recoit un tableau de 6 cases: 3 indexées par des entiers et trois indexées par les noms des champs
    if(jsonResponse.object().count()==6)
    {
        // Recupération​ ​des​ ​infos​ ​(nom,​ ​prenom​​ et ​identifiant​​ sont​​ trois champs​ renvoyés​ par​ la​ requête​ sql utilisée​ par​ le​ ​webService)
        nom=jsonResponse.object()["nom"].toString();
        prenom=jsonResponse.object()["prenom"].toString();
        identifiant=jsonResponse.object()["identifiant"].toString();

        // Si​ c'est​ bon​ on​ ferme​ la​ fenêtre​ de​ connexion​ avec​ un code​ de retour QDialog::accepted
        accept();
    } else {
        // Identification incorrecte
        qDebug()<<"Identification failed";
    }

    // Nettoyage de reply1
    reply1->deleteLater();
}
