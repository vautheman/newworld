#ifndef PDF_H
#define PDF_H

#include <QString>

///
/// \brief The Pdf class
/// La classe Pdf permet la génération final du catalogue au format PDF.
class Pdf
{
private:
    QString Titre;
    QString leTexte;
public:
    Pdf();
    // Déclaration du constructeur de la classe Pdf
    Pdf(QString nomDocument);
    // Ecrit le contenu de la chaine caractères leTexte dans le document PDF
    void ecrireTexte();
    // Ferme le document
    void fermer();
};

#endif // PDF_H
