document.querySelectorAll("form.controle select").forEach(eltElement => eltElement.addEventListener("change", evt => evt.target.form.submit())
);
document.querySelectorAll(".page-produits .produit img").forEach(
    eltImg => eltImg.addEventListener(
        'error', evt=> evt.target.src = "images/produits/teeshirts/blanc.png"
    )
);