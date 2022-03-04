describe('Click', () => {
    it('click sur le panier', () => {
        cy.wait(5000);
        cy.visit('http://localhost:3000/');
        cy.get(".label").click();
        cy.contains('Retour');

    });
})