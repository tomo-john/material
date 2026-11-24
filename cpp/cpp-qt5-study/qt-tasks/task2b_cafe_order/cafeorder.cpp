#include "cafeorder.h"

CafeOrder::CafeOrder(QObject *parent)
    : QObject{parent}
    , m_drinkPrices({
          {"Coffee", 300},
          {"Tea", 250},
          {"Juice", 200},
          {"Water", 100},
    })
    , m_drinkStocks({
          {"Coffee", INITIAL_STOCK},
          {"Tea", INITIAL_STOCK},
          {"Juice", INITIAL_STOCK},
          {"Water", INITIAL_STOCK},
    })
    , m_budget(INITIAL_BUDGET)
    , m_total(0)
{}

int CafeOrder::price(const QString &drink) const
{
    return m_drinkPrices.value(drink);
}

void CafeOrder::order(const QString &drink)
{
    if (!canOrder(drink)) {
        return;
    }

    --m_drinkStocks[drink];
    m_budget -= m_drinkPrices[drink];
    m_total += m_drinkPrices[drink];

    emit stockChanged(drink, m_drinkStocks[drink]);
    emit budgetChanged(m_budget);
    emit totalChanged(m_total);
}

bool CafeOrder::canOrder(const QString &drink) const
{
    if (m_drinkStocks.value(drink) <= 0) {
        return false;
    }

    if (m_budget < m_drinkPrices.value(drink)) {
        return false;
    }

    return true;
}

void CafeOrder::clear()
{
    for(auto it = m_drinkStocks.begin(); it != m_drinkStocks.end(); ++it) {
        it.value() = INITIAL_STOCK;
        emit stockChanged(it.key(), it.value());
    }

    m_budget = INITIAL_BUDGET;
    emit budgetChanged(m_budget);

    m_total = 0;
    emit totalChanged(m_total);
}