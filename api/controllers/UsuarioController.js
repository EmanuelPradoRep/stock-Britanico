const bcrypt = require("bcryptjs");
const models = require("../models");
const token = require("../services/token");

module.exports = {
  add: async (req, res, next) => {
    try {
      req.body.contrasena = await bcrypt.hash(req.body.contrasena, 10);
      const reg = await models.Usuario.create(req.body);
      res.status(200).json(reg);
    } catch (e) {
      res.status(500).send({
        message: "Ocurrió un error",
      });
      next(e);
    }
  },
  query: async (req, res, next) => {
    try {
      console.log(req.headers);
      await models.Usuario.findOne({ where: { id: req.query.id } }).then(
        (reg) => {
          res.status(200).json(reg);
        }
      );
    } catch (e) {
      res.status(500).send({
        message: "Ocurrió un error",
      });
      next(e);
    }
  },
  list: async (req, res, next) => {
    try {
      // let valor=req.query.valor;
      //RegExp funciona como Like en SQL
      const reg = await models.Usuario.findAll();
      //sort es un metodo de ordenamiento, ordena por fecha de creacion
      // .sort({'createAt':-1});
      res.status(200).json(reg);
    } catch (e) {
      res.status(500).send({
        message: "Ocurrió un error",
      });
      next(e);
    }
  },
  update: async (req, res, next) => {
    try {
      let pas = req.body.contrasena;
      await models.Usuario.findOne({ where: { id: req.body.id } }).then(
        (usuario) => {
          if (pas != usuario.contrasena) {
            req.body.contrasena = bcrypt.hash(req.body.contrasena, 10);
            next;
          }
          usuario.update(req.body).then((reg) => {
            res.status(200).json(reg);
          });
        }
      );
    } catch (e) {
      res.status(500).send({
        message: "Ocurrió un error",
      });
      next(e);
    }
  },
  activate: async (req, res, next) => {
    try {
      let usuarioId = req.body.id;
      await models.Usuario.findOne({ where: { id: usuarioId } }).then(
        (usuario) => {
          usuario.update({ estado: true }).then((reg) => {
            res.status(200).json(reg);
          });
        }
      );
    } catch (e) {
      res.status(500).send({
        message: "Ocurrió un error",
      });
      next(e);
    }
  },
  deactivate: async (req, res, next) => {
    try {
      let usuarioId = req.body.id;
      await models.Usuario.findOne({ where: { id: usuarioId } }).then(
        (usuario) => {
          usuario.update({ estado: false }).then((reg) => {
            res.status(200).json(reg);
          });
        }
      );
    } catch (e) {
      res.status(500).send({
        message: "Ocurrió un error",
      });
      next(e);
    }
  },
  login: async (req, res, next) => {
    try {
      let user = await models.Usuario.findOne({
        where: {
          email: req.body.email,
        },
      });
      if (user) {
        let match = await bcrypt.compare(req.body.contrasena, user.contrasena);
        if (match) {
          let tokenReturn = await token.encode(
            user.id,
            user.rol,
            user.email,
            user.nombre,
            user.imagen,
            user.apellido,
            user.activo
          );
          res.status(200).json({ user, tokenReturn });
        } else {
          res.status(404).send({
            message: "Password Incorrecto",
          });
        }
      } else {
        res.status(404).send({
          message: "No existe el usuario",
        });
      }
    } catch (e) {
      res.status(500).send({
        message: "Ocurrió un error",
      });
      next(e);
    }
  },
};
