const tokenService = require('../services/token');
module.exports = {
    verifyAdministrador: async (req, res, next) => {
        if (!req.headers.token){
            return res.status(404).send({
                message: 'No token'
            });
        }
        const response=await tokenService.decode(req.headers.token);
        if (response.rol == 'Administrador'){
            next();
        } else{
            return res.status(403).send({
                message: 'No autorizado'
            });
        }
    },
    verifyColaborador: async (req, res, next) => {
        if (!req.headers.token){
            return res.status(404).send({
                message: 'No token'
            });
        }
        const response=await tokenService.decode(req.headers.token);
        if (response.rol == 'Administrador' || response.rol=='Colaborador'){
            next();
        } else{
            return res.status(403).send({
                message: 'No autorizado'
            });
        }
    },
    verifyUsuario: async (req, res, next) => {
        if (!req.headers.token) {
            return res.status(404).send({
                message: 'No Token'
            });
        }
        const response = await tokenService.decode(req.headers.token);
        switch (response.rol) {
            case 'Administrador':
                next()
                break;
            case 'Colaborador':
                next()
                break;
            case 'Usuario':
                next()  
                break;
            default: res.status(403).send({
                message: 'No autorizado'
            });
        }
        // if (response.rol == 'Administrador' || response.rol == 'Usuario'){
        //     next();
        // } else{
        //     return res.status(403).send({
        //         message: 'No autorizado'
        //     });
        // }
    },
}