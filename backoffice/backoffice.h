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
    ~Backoffice();

private:
    Ui::Backoffice *ui;
};

#endif // BACKOFFICE_H
