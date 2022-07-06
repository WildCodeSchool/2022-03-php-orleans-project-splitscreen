import a2lix_lib from "@a2lix/symfony-collection/src/a2lix_sf_collection";

a2lix_lib.sfCollection.init({
    collectionsSelector: "form div[data-prototype]",
    manageRemoveEntry: true,
    lang: {
        add: "Ajouter",
        remove: "Supprimer",
    },
});
