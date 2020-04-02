#include "rayon.h"
#include <QSql>
#include <QSqlQuery>
#include <QDebug>

Rayon::Rayon(string rayonLib)
{
    rayonLib = rayonLib;
}

string Rayon::getRayonLib() const
{
    return rayonLib;
}


void Rayon::getRayon()
{

}
