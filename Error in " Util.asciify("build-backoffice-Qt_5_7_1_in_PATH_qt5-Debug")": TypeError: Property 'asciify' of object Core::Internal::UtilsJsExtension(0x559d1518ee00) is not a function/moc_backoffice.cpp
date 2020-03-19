/****************************************************************************
** Meta object code from reading C++ file 'backoffice.h'
**
** Created by: The Qt Meta Object Compiler version 67 (Qt 5.7.1)
**
** WARNING! All changes made in this file will be lost!
*****************************************************************************/

#include "../backoffice/backoffice.h"
#include <QtCore/qbytearray.h>
#include <QtCore/qmetatype.h>
#if !defined(Q_MOC_OUTPUT_REVISION)
#error "The header file 'backoffice.h' doesn't include <QObject>."
#elif Q_MOC_OUTPUT_REVISION != 67
#error "This file was generated using the moc from 5.7.1. It"
#error "cannot be used with the include files from this version of Qt."
#error "(The moc has changed too much.)"
#endif

QT_BEGIN_MOC_NAMESPACE
struct qt_meta_stringdata_Backoffice_t {
    QByteArrayData data[12];
    char stringdata0[242];
};
#define QT_MOC_LITERAL(idx, ofs, len) \
    Q_STATIC_BYTE_ARRAY_DATA_HEADER_INITIALIZER_WITH_OFFSET(len, \
    qptrdiff(offsetof(qt_meta_stringdata_Backoffice_t, stringdata0) + ofs \
        - idx * sizeof(QByteArrayData)) \
    )
static const qt_meta_stringdata_Backoffice_t qt_meta_stringdata_Backoffice = {
    {
QT_MOC_LITERAL(0, 0, 10), // "Backoffice"
QT_MOC_LITERAL(1, 11, 21), // "remplirComboBoxRayons"
QT_MOC_LITERAL(2, 33, 0), // ""
QT_MOC_LITERAL(3, 34, 38), // "on_comboBox_rayons_currentInd..."
QT_MOC_LITERAL(4, 73, 5), // "index"
QT_MOC_LITERAL(5, 79, 27), // "remplirQTableWidgetProduits"
QT_MOC_LITERAL(6, 107, 11), // "index_rayon"
QT_MOC_LITERAL(7, 119, 35), // "on_tableWidget_produits_cellC..."
QT_MOC_LITERAL(8, 155, 3), // "row"
QT_MOC_LITERAL(9, 159, 6), // "column"
QT_MOC_LITERAL(10, 166, 38), // "on_pushButton_accepted_produi..."
QT_MOC_LITERAL(11, 205, 36) // "on_pushButton_denied_produit_..."

    },
    "Backoffice\0remplirComboBoxRayons\0\0"
    "on_comboBox_rayons_currentIndexChanged\0"
    "index\0remplirQTableWidgetProduits\0"
    "index_rayon\0on_tableWidget_produits_cellClicked\0"
    "row\0column\0on_pushButton_accepted_produit_clicked\0"
    "on_pushButton_denied_produit_clicked"
};
#undef QT_MOC_LITERAL

static const uint qt_meta_data_Backoffice[] = {

 // content:
       7,       // revision
       0,       // classname
       0,    0, // classinfo
       6,   14, // methods
       0,    0, // properties
       0,    0, // enums/sets
       0,    0, // constructors
       0,       // flags
       0,       // signalCount

 // slots: name, argc, parameters, tag, flags
       1,    0,   44,    2, 0x08 /* Private */,
       3,    1,   45,    2, 0x08 /* Private */,
       5,    1,   48,    2, 0x08 /* Private */,
       7,    2,   51,    2, 0x08 /* Private */,
      10,    0,   56,    2, 0x08 /* Private */,
      11,    0,   57,    2, 0x08 /* Private */,

 // slots: parameters
    QMetaType::Void,
    QMetaType::Void, QMetaType::Int,    4,
    QMetaType::Void, QMetaType::Int,    6,
    QMetaType::Void, QMetaType::Int, QMetaType::Int,    8,    9,
    QMetaType::Void,
    QMetaType::Void,

       0        // eod
};

void Backoffice::qt_static_metacall(QObject *_o, QMetaObject::Call _c, int _id, void **_a)
{
    if (_c == QMetaObject::InvokeMetaMethod) {
        Backoffice *_t = static_cast<Backoffice *>(_o);
        Q_UNUSED(_t)
        switch (_id) {
        case 0: _t->remplirComboBoxRayons(); break;
        case 1: _t->on_comboBox_rayons_currentIndexChanged((*reinterpret_cast< int(*)>(_a[1]))); break;
        case 2: _t->remplirQTableWidgetProduits((*reinterpret_cast< int(*)>(_a[1]))); break;
        case 3: _t->on_tableWidget_produits_cellClicked((*reinterpret_cast< int(*)>(_a[1])),(*reinterpret_cast< int(*)>(_a[2]))); break;
        case 4: _t->on_pushButton_accepted_produit_clicked(); break;
        case 5: _t->on_pushButton_denied_produit_clicked(); break;
        default: ;
        }
    }
}

const QMetaObject Backoffice::staticMetaObject = {
    { &QMainWindow::staticMetaObject, qt_meta_stringdata_Backoffice.data,
      qt_meta_data_Backoffice,  qt_static_metacall, Q_NULLPTR, Q_NULLPTR}
};


const QMetaObject *Backoffice::metaObject() const
{
    return QObject::d_ptr->metaObject ? QObject::d_ptr->dynamicMetaObject() : &staticMetaObject;
}

void *Backoffice::qt_metacast(const char *_clname)
{
    if (!_clname) return Q_NULLPTR;
    if (!strcmp(_clname, qt_meta_stringdata_Backoffice.stringdata0))
        return static_cast<void*>(const_cast< Backoffice*>(this));
    return QMainWindow::qt_metacast(_clname);
}

int Backoffice::qt_metacall(QMetaObject::Call _c, int _id, void **_a)
{
    _id = QMainWindow::qt_metacall(_c, _id, _a);
    if (_id < 0)
        return _id;
    if (_c == QMetaObject::InvokeMetaMethod) {
        if (_id < 6)
            qt_static_metacall(this, _c, _id, _a);
        _id -= 6;
    } else if (_c == QMetaObject::RegisterMethodArgumentMetaType) {
        if (_id < 6)
            *reinterpret_cast<int*>(_a[0]) = -1;
        _id -= 6;
    }
    return _id;
}
QT_END_MOC_NAMESPACE
