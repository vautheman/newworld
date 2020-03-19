#include "dialogconnexion.h"
#include "ui_dialogconnexion.h"

#include <QDebug>
#include <QtSql>

DialogConnexion::DialogConnexion(QWidget *parent) :
    QDialog(parent),
    ui(new Ui::DialogConnexion)
{
    ui->setupUi(this);
}

DialogConnexion::~DialogConnexion()
{
    delete ui;
}

void DialogConnexion::on_pushButtonConnection_clicked()
{
    QString connectUser = ui->lineEditLogin->text();
    QString connectPasswd = ui->lineEditPassword->text();
    qDebug()<<connectUser;
    qDebug()<<connectPasswd;

    QSqlQuery requete;

    requete.exec("select userEmail , userPasswd from utilisateur where userEmail ='" + connectUser + "' and userPasswd='" + connectPasswd +"'");
    // Si les identifiants rentrés fonctionnent
    if(requete.next())
    {
        qDebug()<<"Connexion OK";
        // On accepte la connexion et le mainWindow prend le relai
        accept();
    } else qDebug()<<"Connexion fail";
}

void DialogConnexion::on_pushButton_2_clicked()
{
    close();
}
