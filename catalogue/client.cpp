#include "client.h"
#include "passerelle.h"
#include "pointrelai.h"
#include <QDebug>

int Client::getCliId() const
{
    return cliId;
}

Client::Client()
{

}

Client::Client(int id, QString nom, QString prenom, QString email, QString rue, QString cp, QString ville)
{
    cliId = id;
    cliNom = nom;
    cliPrenom = prenom;
    cliEmail = email;
    cliRue = rue;
    cliCP = cp;
    cliVille = ville;

    qDebug()<<cliNom + ", " + cliPrenom + ", " + cliEmail;
    sesPointsRelais=Passerelle::chargerLesPointsRelaisDuClient(id);
}

QString Client::versChaineClient()
{
    QString chaine;
    chaine += "<div>";
    chaine += "<h3>For " + cliNom + " " + cliPrenom + "</h3>";
    chaine += "<p>E-Mail : "+ cliEmail +"</p>";
    chaine += "<p>Address : " + cliCP + " " + cliVille + ", " + cliRue + "</p>";
    chaine += "</div>";
    for(int noPtRelais=0;noPtRelais<sesPointsRelais.size();noPtRelais++)
    {
        chaine+=sesPointsRelais[noPtRelais].versChainePointRelai();
    }
    return chaine;
}
