var mysql = require('mysql2');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "shivansh",
  database: "inneed"
});

module.exports=con

