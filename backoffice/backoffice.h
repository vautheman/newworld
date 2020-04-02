#ifndef BACKOFFICE_H
#define BACKOFFICE_H

#include <QMainWindow>

namespace Ui {
class Backoffice;
}

class Backoffice : public QMainWindow
{
    Q_OBJECT

public:
    explicit Backoffice(QWidget *parent = nullptr);
    QStringList list_rayons;
    QStringList list_produits;

    int current_index_rayon;
    ~Backoffice();

private slots:
    void remplirComboBoxRayons();

    void on_comboBox_rayons_currentIndexChanged(int index);

    void remplirQTableWidgetProduits(int index_rayon);

    void on_tableWidget_produits_cellClicked(int row, int column);

    void on_pushButton_accepted_produit_clicked();

    void on_pushButton_denied_produit_clicked();

private:
    Ui::Backoffice *ui;
    QString rayonLib;
};

#endif // BACKOFFICE_H
