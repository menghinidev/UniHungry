function registerClick(form, password, checkbox) {
   // Crea un elemento di input che verrà usato come campo di output per lo user_type
   var p = document.createElement("input");
   // Aggiungi un nuovo elemento al tuo form.
   form.appendChild(p);
   p.name = "user_type";
   p.type = "hidden"
   if (checkbox.is(":checked"))
   {
      p.value = "Fornitore";
    } else {
      p.value = "Cliente";
    }
   formhash(form, password);
}
