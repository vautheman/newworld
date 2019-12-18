#include <QCoreApplication>
#include "passerelle.h"
#include <QDebug>
#include <QSqlDatabase>

int main()
{
    QSqlDatabase dbNewworld = QSqlDatabase::addDatabase("QMYSQL");

    dbNewworld.setHostName("localhost"); // adresse ip serveur MySQL
    dbNewworld.setDatabaseName("newworld"); // nom de la base
    dbNewworld.setUserName("autheman"); // Nom d'utilisateur
    dbNewworld.setPassword("ij4udh1A*"); // mot de passe de la base

    if(dbNewworld.open())
    {
    Passerelle maPasserelle;
    maPasserelle.chargerLesClients();
    return 0;
    }
    else {
         qDebug()<<"Echec - Ouverture de la base echoué";
         return 125;
    }
}
