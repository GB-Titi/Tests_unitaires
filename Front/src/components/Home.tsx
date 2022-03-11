import React from "react";
import useHome from "../hooks/useHome";
const Home = ({ setRoute }: { setRoute: (data: any) => void }) => {
  const { loading, products } = useHome();
  return (
    <div>
      {loading && <div>Loading....</div>}
      <div className="label" onClick={() => setRoute({ route: "cart" })}>Aller sur panier</div>
      <div className="product_list">
        {products.map((product) => {
          return (
            <React.Fragment>
              <div className="product"
                onClick={() => setRoute({ route: "product", data: product })}
              >
                <img className="image" src={product.image} alt="" />
                <p className="name">Figurine de {product.name}</p>
                <p className="qty">Quantitée {product.quantity}</p>
              </div>
              <hr />
            </React.Fragment>
          );
        })}
      </div>
    </div>
  );
};
export default Home;