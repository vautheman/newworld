#include "passerelle.h"
#include "client.h"
#include "pointrelai.h"

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
}
