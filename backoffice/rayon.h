#ifndef RAYON_H
#define RAYON_H
#include <iostream>
#include <QVector>
using namespace std;


class Rayon
{
public:
    void getRayon();

private:
    QVector<Rayon> rayonLib;
};

#endif // RAYON_H
