const express = require("express");
const bodyParser = require("body-parser");
const cors = require("cors");
const app = express();
const PORT = 3000;

app.use(cors());
app.use(bodyParser.json());

app.post("/submit-form", (req, res) => {
  const { name, email, message } = req.body;
  console.log(`Received: Name=${name}, Email=${email}, Message=${message}`);
  res.status(200).json({ message: "Form submitted successfully!" });
});

app.listen(PORT, () => console.log(`Server running on http://localhost:${PORT}`));
