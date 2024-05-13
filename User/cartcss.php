<?php header("Content-type: text/css"); ?>
.cart-title {
    font-size: 1.5rem;
    color: var(--text-color);
    background-color: var(--main-background-color);
    width: 100%;
    padding: 17px;
}

/* Nội dung chính giỏ hàng */
/* Tiêu đề phân loại */
.cart__main-content {
    display: flex;
    padding: 30px 35px 150px 35px;
}

.cart-content {
    display: flex;
    flex-direction: column;
}

.cart__item-head {
    display: flex;
    padding-bottom: 15px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.cart__product-info {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    font-size: 1.5rem;
    color: var(--text-color);
    width: 380px;
}


.cart__product-price {
    font-size: 1.5rem;
    color: var(--text-color);
    width: 95.48px;
}

.cart__product-numbers {
    font-size: 1.5rem;
    color: var(--text-color);
    width: 143.22px;
}

.cart__product-subtotal {
    font-size: 1.5rem;
    color: var(--text-color);
    width: 100px;
}

.cart__product-remove {
    width: 23.88px;
}

/* Danh sách đơn hàng */
.cart__list-product {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    padding-bottom: 15px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.05);
}

.cart__img-css {
    width: 50px;
    height: 50px;
}

.cart__product-text {
    margin-left: 30px;
}

.cart__remove-icon {
    font-size: 1.8rem;
}

/* Tổng thanh toán */
.cart__totals {
    display: flex;
    flex-direction: column;
    margin: 0 30px;
}

.cart__totals-title {
    font-size: 1.5rem;
    color: var(--text-color);
    border-bottom: 1px solid #e2e2e2;
}

.cart__totals-details {
    padding: 18.675px 0;
    border-bottom: 1px solid #e2e2e2;
}

.text__price-currency {
    font-size: 1.5rem;
    color: var(--text-color);
}

.totals-details {
    display: flex;
    justify-content: space-between;
}

.subtotal__price-currency {
    font-size: 1.5rem;
    color: var(--text-color);
    text-align: right;
}

.cart__btn-payment {
    padding: 18.675px 0;
    margin-left: auto;
}


