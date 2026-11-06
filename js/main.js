document.querySelectorAll("form.controle select").forEach(eltElement => eltElement.addEventListener("change", evt => evt.target.form.submit())
);