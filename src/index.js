const express=require('express')
const app=express()
const con = require("./db")
const port=process.env.PORT || 3000
app.use(express.json())

app.get("/",(req,res)=>{
    con.connect(function(err) {
        if (err) throw err;
        con.query("SELECT * FROM job_details", function (err, result, fields) {
          if (err) throw err;
          res.send(result)
        });
      });
})

app.listen(port,()=>{
    console.log("Listening at port 3000")
})