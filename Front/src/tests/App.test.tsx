import React from 'react';
import ReactDOM from "react-dom";
import { render, screen } from '@testing-library/react';
import App from '../App';
import { act } from 'react-dom/test-utils';

let container: any;

beforeEach(() => {
  container = document.createElement("div");
  document.body.appendChild(container);
});

test('renders learn react link', () => {
  const { container } = render(<App />);
  const cart = screen.getByText(/Aller sur panier/i);
  expect(cart).toBeInTheDocument();

});


test("test sur le click", () => {
  act(() => {
    ReactDOM.render(<App />, container);
  });
  const label = container.querySelector(".label");
  act(() => {
    label.dispatchEvent(new MouseEvent("click", { bubbles: true }));
  });
  const retour = screen.getByText(/Retour/i);
  expect(retour).toBeInTheDocument();
})