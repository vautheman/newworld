#include "producteur.h"

Producteur::Producteur(QString nomEnt, QString activite, QString adresse)
{
    prodNomEnt = nomEnt;
    prodActivite = activite;
    prodAdresse = adresse;
}

QString Producteur::versChaineProducteur()
{
    QString chaine;
    chaine += prodNomEnt + ", ";
    chaine += prodActivite +", ";
    chaine += prodAdresse;

    return chaine;
}
