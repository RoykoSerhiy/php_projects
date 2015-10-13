SELECT u.id as uid, u.name, a.id as aid, a.title, a.content, a.date_created as date FROM users u 
INNER JOIN articles a ON a.user_id = u.id
