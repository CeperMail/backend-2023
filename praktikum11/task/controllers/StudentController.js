// TODO 3: Import data students dari folder data/students.js
const students = require('../data/students.js');

// Membuat Class StudentController
class StudentController {
    index(req, res) {
      
    }
  
    store(req, res) {
      const students = require('../data/students.json');
      students.push(req.body);
      res.send(req.body);      
    }
  
    update(req, res) {
      const {id} = req.params;
      const {nama} = req.body;
      const data = {
        message: "Mengedit student id ${id} dengan nama ${nama}",
        data: [],
      };
      res.json(data);
    }
    destroy(req, res) {
      const {id} = req.params;
      const data = {
        message: "Menghapus student id ${id}",
        data: [],
      };
      res.json(data);
    }
  }
  
  // Membuat object StudentController
  const object = new StudentController();
  
  // Export object StudentController
  module.exports = object;