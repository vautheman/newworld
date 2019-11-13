#include "producteur.h"

Producteur::Producteur(QString nomEnt, QString activite, QString adresse, QString pays, QString ville, QString cp)
{
    nomEnt = prodNomEnt;
    activite = prodActivite;
    adresse = prodAdresse;
    pays = prodPays;
    ville = prodVille;
    cp = prodCP;
}

QString Producteur::versChaine()
{
    QString chaine;
    chaine += "Entreprise : " + prodNomEnt;
    chaine += "Activité : " + prodActivite;
    chaine += "Adresse : " + prodAdresse;
    chaine += "Pays : " + prodPays;
    chaine += "Ville : " + prodVille;
    chaine += "CP : " + prodCP;

    return chaine;
}
