#ifndef CLIENT_H
#define CLIENT_H

#include <QString>

class Client
{
private:
    // Propriété des clients
    // Nom
    QString cliNom;
    // Prenom
    QString cliPrenom;
    // Email
    QString cliEmail;

public:
    Client();
    // Constructeur qui va créer les clients
    Client(QString nom, QString prenom, QString email);
};

#endif // CLIENT_H
