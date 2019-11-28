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

Client::Client(int id, QString nom, QString prenom, QString email)
{
    cliId = id;
    cliNom = nom;
    cliPrenom = prenom;
    cliEmail = email;
    qDebug()<<cliNom + ", " + cliPrenom + ", " + cliEmail;
    sesPointsRelais=Passerelle::chargerLesPointsRelaisDuClient(id);
}

QString Client::versChaineClient()
{
    QString chaine;
    chaine += "<h3>For " + cliNom + " " + cliPrenom + "</h3>";
    chaine += "<p>E-Mail : "+ cliEmail +"</p>";
    chaine += "<p>Address : </p>";
    for(int noPtRelais=0;noPtRelais<sesPointsRelais.size();noPtRelais++)
    {
        chaine+=sesPointsRelais[noPtRelais].versChainePointRelai();
    }
    return chaine;
}

