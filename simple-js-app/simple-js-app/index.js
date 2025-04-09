const express = require('express');
const path = require('path'); // Required for resolving the file path
const app = express();
const port = 3000;

// Serve static files from the 'public' directory
app.use(express.static(path.join(__dirname, 'public'))); 

// Route to serve index.html
app.get('/', (req, res) => { 
  console.log(req.url)
  res.sendFile(path.join(__dirname, 'public', 'index.html '))
});

// Start the server
app.listen(port, () => {
  console.log(`Server listening on port ${port}`);
})