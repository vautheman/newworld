#include "client.h"
#include <QDebug>

Client::Client()
{

}

Client::Client(QString nom, QString prenom, QString email)
{
    cliNom = nom;
    cliPrenom = prenom;
    cliEmail = email;
}

QString Client::versChaineClient()
{
    QString chaine;
    chaine += cliNom+", ";
    chaine += cliPrenom+", ";
    chaine += cliEmail;
    return chaine;
}

