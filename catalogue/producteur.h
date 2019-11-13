#ifndef PRODUCTEUR_H
#define PRODUCTEUR_H

#include <QString>

class Producteur
{
    // Propriétés des producteurs

    // Nom du de l'entreprise
    QString prodNomEnt;
    // Son activité
    QString prodActivite;
    // Son adresse
    QString prodAdresse;
    // Son pays
    QString prodPays;
    // Sa ville
    QString prodVille;
    // Son code postal
    QString prodCP;
public:
    Producteur();
    // Constructeur qui va créer les producteurs
    Producteur(QString nomEnt, QString activite, QString adresse, QString pays, QString ville, QString cp);

    // Methode versChaine des producteurs
    QString versChaine();
};

#endif // PRODUCTEUR_H
