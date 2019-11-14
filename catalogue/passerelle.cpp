#include "passerelle.h"
#include "client.h"
#include "pointrelai.h"
#include "producteur.h"

#include <QtSql>
#include <QDebug>

Passerelle::Passerelle()
{

}

void Passerelle::chargerLesClients()
{
    qDebug()<<"void Passerelle::chargerLesClients()";
    // Conenxion base de données

        qDebug()<<"Ok - Ouverture de la base effectué";

        // Récupération des clients dans la base de données
        QSqlQuery reqClient;
        reqClient.exec("select * from clients natural join utilisateur where clients.userId = utilisateur.userId;");
        while(reqClient.next())
        {
            // On stocke les valeurs récupérés
            int cliId = reqClient.value("cliId").toInt();
            qDebug()<<cliId;
            QString cliNom = reqClient.value("userNom").toString();
            QString cliPrenom = reqClient.value("userPrenom").toString();
            QString cliEmail = reqClient.value("userEmail").toString();

            // On appelle le constructeur du client
            Client monClient(cliNom, cliPrenom, cliEmail);
            QString chaineDuClient=monClient.versChaineClient();
            qDebug()<<chaineDuClient;

            // Récupération des points relais que le client a ajouté
            QSqlQuery reqPointRelai;
            reqPointRelai.prepare("select * from selection natural join pointRelai where cliId = :cliId;");
            reqPointRelai.bindValue(":cliId", cliId);
            reqPointRelai.exec();
            while(reqPointRelai.next())
            {
                // On stocke les valeurs du point relai récupéré
                QString pRNom = reqPointRelai.value("relaiNom").toString();
                QString pRAdresse = reqPointRelai.value("relaiPays").toString() + ", " + reqPointRelai.value("relaiVille").toString() + ", " + reqPointRelai.value("relaiCP").toString() + ", " + reqPointRelai.value("relaiAdresse").toString();

                PointRelai monPointRelai(cliNom, cliPrenom, cliEmail, pRNom, pRAdresse);
                QString chaineDuPointRelai = monPointRelai.versChainePointRelai();
                qDebug()<<chaineDuPointRelai;
            }
        }

        // Récupération des producteurs dans la base de données
        QSqlQuery reqProducteur;
        reqProducteur.exec("select * from producteurs natural join utilisateur where producteurs.userId = utilisateur.userId;");
        //reqProducteur.exec("select * from choix natural join producteurs natural join utilisateur where producteurs.userId = utilisateur.userId;");
        while(reqProducteur.next())
        {
            // On stoke les valeurs récupérés
            int prodId = reqProducteur.value("prodId").toInt();
            qDebug()<<prodId;
            QString prodNomEnt = reqProducteur.value("prodNomEnt").toString();
            QString prodActivite = reqProducteur.value("prodActivite").toString();
            QString prodAdresse = reqProducteur.value("prodPays").toString() + ", " + reqProducteur.value("prodVille").toString() + ", " + reqProducteur.value("prodCP").toString();

            // On appelle le constructeur du producteur
            //Producteur monProducteur(prodNomEnt, prodActivite, prodAdresse);
            QString chaineDuProducteur = monProducteur.versChaineProducteur();
            qDebug()<<chaineDuProducteur;

            // On fait la requete des points relai des différents producteurs
            QSqlQuery reqProdPointRelai;
            reqProdPointRelai.prepare("select * from choix natural join pointRelai where prodId = :prodId");
            reqProdPointRelai.bindValue(":prodId", prodId);
            reqProdPointRelai.exec();
        }
}

void Passerelle::chargerLesPointsRelais()
{
    // Récupération des points relai dans la base de données
    QSqlQuery reqPointRelai;
    reqPointRelai.exec("SELECT * FROM pointRelai");
    while(reqPointRelai.next())
    {
        // On stocke les valeurs récupéré
        int relaiId = reqPointRelai.value("relaiId").toInt();
        QString relaiNom = reqPointRelai.value("relaiNom").toString();
        QString relaiAdresse = reqPointRelai.value("relaiPays").toString() + ", " + reqPointRelai.value("relaiVille").toString() + ", " + reqPointRelai.value("relaiCP").toString() + ", " + reqPointRelai.value("relaiAdresse").toString();

        // On appelle le constructeur du point relai
        PointRelai monPointRelai(relaiNom, relaiAdresse);
    }
}
