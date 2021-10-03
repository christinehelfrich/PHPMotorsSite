INSERT INTO 
    clients (clientFirstname, clientLastname, clientEmail, clientPassword, clientLevel, comment) Values ('Tony', 'Stark', 'tony@starkent.com', 'Iam1ronM@n', 1, "I am the real Ironman");


UPDATE 
    clients
SET
    clientLevel = 1
WHERE
    clientFirstname = "Tony"  ;


UPDATE 
    inventory
SET
    invDescription = replace("small interior", "small interior", "spacious interior")
WHERE
    invMake = "GM"  ;


SELECT
    inventory.invModel, carclassification.classificationName
FROM
    inventory
INNER JOIN
    carclassification ON inventory.invModel = carclassification.classificationName;


DELETE
FROM
    inventory
WHERE 
    invMake = "Jeep";

UPDATE
    inventory
SET 
    invImage=CONCAT(invImage, '/phpmotors'), invThumbnail=CONCAT(invThumbnail, '/phpmotors');

