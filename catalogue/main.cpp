#include <QApplication>
#include "passerelle.h"
#include <QDebug>
#include <QSqlDatabase>
#include "pdf.h"

int main(int argc, char *argv[])
{
    QApplication monApp(argc, argv);
    QSqlDatabase dbNewworld = QSqlDatabase::addDatabase("QMYSQL");

    dbNewworld.setHostName("localhost"); // adresse ip serveur MySQL
    dbNewworld.setDatabaseName("newworld"); // nom de la base
    dbNewworld.setUserName("autheman"); // Nom d'utilisateur
    dbNewworld.setPassword("ij4udh1A*"); // mot de passe de la base

    if(dbNewworld.open())
    {
        Passerelle maPasserelle;
        QVector<Client> vectClients=maPasserelle.chargerLesClients();
        for(int noClient=0;noClient<vectClients.size();noClient++)
        {
            Pdf monPdf("Catalogue_"+QString::number(vectClients[noClient].getCliId())+".pdf");
            monPdf.ecrireTexte(vectClients[noClient].versChaineClient());
            monPdf.imprimer();
        }
        return 0;
    }
    else {
        qDebug()<<"Echec - Ouverture de la base echoué";
        return 125;
    }
}
