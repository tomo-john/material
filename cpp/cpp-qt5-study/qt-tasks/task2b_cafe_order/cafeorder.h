#ifndef CAFEORDER_H
#define CAFEORDER_H

#include <QObject>
#include <QMap>
#include <QString>

class CafeOrder : public QObject
{
    Q_OBJECT
public:
    explicit CafeOrder(QObject *parent = nullptr);
    int price(const QString &drink) const;
    bool canOrder(const QString &drink) const;

public slots:
    void order(const QString &drink);
    void clear();

signals:
    void stockChanged(const QString &drink, int newStock);
    void budgetChanged(int newBudget);
    void totalChanged(int newTotal);

private:
    static constexpr int INITIAL_STOCK = 5;     // 各ドリンクの初期在庫
    static constexpr int INITIAL_BUDGET = 1000; // 予算の初期値
    QMap<QString, int> m_drinkPrices;
    QMap<QString, int> m_drinkStocks;
    int m_budget;
    int m_total;
};

#endif // CAFEORDER_H
