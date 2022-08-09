
insert into admins(email,mdp) values('admin@gmail.com','admin123');



insert into stocks(produit_id,quantite,prix_unitaire) values(1,100,12000);
insert into stocks(produit_id,quantite,prix_unitaire) values(2,100,3500);
insert into stocks(produit_id,quantite,prix_unitaire) values(3,100,500);
insert into stocks(produit_id,quantite,prix_unitaire) values(4,100,1650);
insert into stocks(produit_id,quantite,prix_unitaire) values(5,100,1300);
insert into stocks(produit_id,quantite,prix_unitaire) values(6,100,1000);
insert into stocks(produit_id,quantite,prix_unitaire) values(7,100,2200);
insert into stocks(produit_id,quantite,prix_unitaire) values(8,100,9000);
insert into stocks(produit_id,quantite,prix_unitaire) values(9,100,6600);
insert into stocks(produit_id,quantite,prix_unitaire) values(10,100,17320);
insert into stocks(produit_id,quantite,prix_unitaire) values(11,100,21000);



-- create view stat_produits AS
--     SELECT
--     produit_id ,sum(quantite) as Total
--     from achats
--     group by produit_id
--     ;
    drop view view_Payements;
    drop view view_Details_Payements;


    create view view_Details_Payements AS
        select
        users.id,
        users.nom,
        users.prenom,
        users.email,
        payements.montant,
        payements.created_at as date_De_Payement
        from users
        join payements on users.id = payements.user_id;


create view view_payements as
select
nom,prenom,email,date_De_Payement,sum(montant) as montant from view_Details_Payements
group by nom,prenom,email,date_De_Payement;



    create view stat_pro AS
    SELECT
    produits.nom,
    achats.quantite,
    achats.produit_id
    from  produits
    join achats on produits.id = achats.produit_id;

create view stat_produits AS
    SELECT
    produit_id , nom ,sum(quantite) as Total
    from stat_pro
    group by produit_id,nom
    ;

    drop view stat_produits;
    drop view stat_pro;




