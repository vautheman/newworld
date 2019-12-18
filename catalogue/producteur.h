#ifndef PRODUCTEUR_H
#define PRODUCTEUR_H

#include <QString>
#include "pointrelai.h"

///
/// \brief The Producteur class
/// La classe producteur permet de stocker les informations de ce dernier dans des paramètres
class Producteur:public PointRelai
{
private:
    // L'identifiant du producteur
    int producteurId;
    // Le nom de la société du producteur
    QString producteurNomSociete;
    // L'adresse du producteur
    QString producteurAdresse;
public:
    // Déclaration du constructeur vide
    Producteur();
    // Déclaration du constructeur des producteurs
    Producteur(QString sonNomDeSociete, QString sonAdresse);

    // Fonction qui permet l'affichage des producteurs
    QString versChaineProducteurs();
};

#endif // PRODUCTEUR_H
