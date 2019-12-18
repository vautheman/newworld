#include "producteur.h"
#include <QDebug>

Producteur::Producteur()
{

}

Producteur::Producteur(QString sonNomDeSociete, QString sonAdresse)
{
    this->producteurNomSociete = sonNomDeSociete;
    this->producteurAdresse = sonAdresse;

    qDebug()<<" " + producteurNomSociete + ", " + producteurAdresse;
}
