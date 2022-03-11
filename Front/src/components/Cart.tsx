import React from "react";
import useCart from "../hooks/useCart";
const Cart = ({ setRoute }: { setRoute: (data: any) => void }) => {
  const { loading, products, message, loadCart, removeToCart } = useCart();
  return (
    <div>
      {loading && <div>Loading....</div>}
      {message && <p>{message}</p>}
      <div onClick={() => setRoute({ route: "home" })}>Retour</div>
      <div className="product_list">
        {products.map((product) => {
          return (
            <React.Fragment>
              <div className="product">
                <img className="image" src={product.image} alt="" />
                <p className="name">Figurine de {product.name}</p>
                <p className="qty">Quantitée {product.quantity}</p>
              </div>
              <button className="button" onClick={() => removeToCart(product)}>
                Supprimer du panier
              </button>
              <hr />
            </React.Fragment>
          );
        })}
      </div>
    </div>
  );
};
export default Cart;