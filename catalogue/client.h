#ifndef CLIENT_H
#define CLIENT_H

#include <QString>

///
/// \brief The Client class
/// La classe client permet de récuperer les clients de la base de données et stockes les valeurs retournées dans des propriétés via un constructeur
/// Ainsi l'affichage de ses derniers deviens possible grâce à la fonction versChaineClient.
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

    QString versChaineClient();
};

#endif // CLIENT_H
