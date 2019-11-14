#ifndef PRODUCTEUR_H
#define PRODUCTEUR_H

#include <QString>
#include <QVector>

class Producteur
{
    // Propriétés des producteurs
    // Nom de l'entreprise
    QString prodNomEnt;
    // Son activité
    QString prodActivite;
    // Son adresse
    QString prodAdresse;
    // Les points relai qu'il a chosit
    QVector<Producteur> sesPointsRelais;
public:
    Producteur();
    // Constructeur qui va créer les producteurs
    Producteur(QString nomEnt, QString activite, QString adresse, QString);

    // Methode versChaine des producteurs
    QString versChaineProducteur();
};

#endif // PRODUCTEUR_H
