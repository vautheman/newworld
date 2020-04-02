#include "backoffice.h"
#include "dialogconnexion.h"
#include "rayon.h"
#include <QApplication>
#include <QtSql>

int main(int argc, char *argv[])
{
    QApplication a(argc, argv);
    DialogConnexion connexion;
    // Instanciation de la viariable membre dbNewworld
    QSqlDatabase dbNewworld = QSqlDatabase::addDatabase("QMYSQL");

    // Definition des paramètres de connexion à la base de données
    dbNewworld.setHostName("localhost"); // @ip serveur MySQL
    dbNewworld.setDatabaseName("newworld"); // Nom de la base
    dbNewworld.setUserName("autheman"); // Nom d'utilisateur
    dbNewworld.setPassword("ij4udh1A*"); // Mot de passe

    if(dbNewworld.open())
    {
        qDebug()<<"Connexion à la base OK";
        if(connexion.exec()==QDialog::Accepted)
        {
            Backoffice maMain;
            maMain.show();
            return a.exec();
        }
    } else qDebug()<<"Connexion à la base FAIL";
    return 125;
}
