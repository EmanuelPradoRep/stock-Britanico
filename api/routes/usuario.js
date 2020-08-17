const routerx = require('express-promise-router');
const usuarioController = require('../controllers/UsuarioController');
const auth = require('../middlewares/auth');

const router = routerx();

router.post('/login', usuarioController.login);
router.post('/add',auth.verifyAdministrador, usuarioController.add);
router.get('/list', auth.verifyAdministrador,usuarioController.list);
router.put('/update', auth.verifyUsuario,usuarioController.update);
router.get('/query', auth.verifyUsuario, usuarioController.query);
router.put('/activate', auth.verifyAdministrador,usuarioController.activate);
router.put('/deactivate', auth.verifyAdministrador,usuarioController.deactivate);
// router.delete('/remove', auth.verifyAdministrador,usuarioController.remove);



module.exports = router;