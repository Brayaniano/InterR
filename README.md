# InterR

Este repositorio fue creado para presentar la prueba de selección de desarrollador Magento 2.

Contiene dos módulos y un tema:

| Componente | Ruta | Qué hace |
|---|---|---|
| `InterR_HelloWorld` | `app/code/InterR/HelloWorld` | Controlador frontend en `/helloworld/index/index` que muestra "Hola Mundo desde mi módulo" |
| `InterR_DescripcionCustom` | `app/code/InterR/DescripcionCustom` | Override del bloque `Magento\Catalog\Block\Product\View\Description` para agregar un texto al final de la descripción |
| `InterR/customtheme` | `app/design/frontend/InterR/customtheme` | Tema hijo de `Magento/luma` con logo personalizado y título de producto en rojo |

## Instalación

Copiar las carpetas en las rutas indicadas en la tabla y verificar el modo en el que está corriendo el sitio:

```bash
php bin/magento deploy:mode:show
```

### Módulos

**Modo desarrollo**

```bash
php bin/magento module:enable InterR_HelloWorld InterR_DescripcionCustom
php bin/magento setup:upgrade
php bin/magento cache:flush
```

**Modo producción**

En producción Magento no genera código ni archivos estáticos al vuelo, por eso se debe compilar y desplegar:

```bash
php bin/magento maintenance:enable
php bin/magento module:enable InterR_HelloWorld InterR_DescripcionCustom
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f es_CO en_US
php bin/magento cache:flush
php bin/magento maintenance:disable
```

Para confirmar que quedaron habilitados:

```bash
php bin/magento module:status
```

### Tema

1. Copiar el tema en `app/design/frontend/InterR/customtheme`.
2. Ejecutar:
   ```bash
   php bin/magento setup:upgrade
   php bin/magento cache:flush
   ```
3. En el admin ir a **Content > Design > Configuration**, elegir el scope (global o store view) y en *Applied Theme* seleccionar **InterR Custom Theme**.
4. Guardar y, si el sitio está en producción, volver a desplegar los estáticos:
   ```bash
   php bin/magento setup:static-content:deploy -f es_CO en_US
   php bin/magento cache:flush
   ```

En modo desarrollo el último paso normalmente no es necesario, porque Magento compila el LESS al vuelo.

# InterR

Este repositorio fue creado para presentar la prueba de selección de desarrollador Magento 2 (Sección 2: ejercicio práctico).

Contiene dos módulos y un tema:

| Componente | Ruta | Qué hace |
|---|---|---|
| `InterR_HelloWorld` | `app/code/InterR/HelloWorld` | Controlador frontend en `/helloworld/index/index` que muestra "Hola Mundo desde mi módulo" |
| `InterR_DescripcionCustom` | `app/code/InterR/DescripcionCustom` | Override del bloque `Magento\Catalog\Block\Product\View\Description` para agregar un texto al final de la descripción |
| `InterR/customtheme` | `app/design/frontend/InterR/customtheme` | Tema hijo de `Magento/luma` con logo personalizado y título de producto en rojo |

## Instalación

Copiar las carpetas en las rutas indicadas en la tabla y verificar el modo en el que está corriendo el sitio:

```bash
php bin/magento deploy:mode:show
```

### Módulos

**Modo desarrollo**

```bash
php bin/magento module:enable InterR_HelloWorld InterR_DescripcionCustom
php bin/magento setup:upgrade
php bin/magento cache:flush
```

**Modo producción**

En producción Magento no genera código ni archivos estáticos al vuelo, por eso se debe compilar y desplegar:

```bash
php bin/magento maintenance:enable
php bin/magento module:enable InterR_HelloWorld InterR_DescripcionCustom
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f es_CO en_US
php bin/magento cache:flush
php bin/magento maintenance:disable
```

Para confirmar que quedaron habilitados:

```bash
php bin/magento module:status
```

### Tema

1. Copiar el tema en `app/design/frontend/InterR/customtheme`.
2. Ejecutar:
   ```bash
   php bin/magento setup:upgrade
   php bin/magento cache:flush
   ```
3. En el admin ir a **Content > Design > Configuration**, elegir el scope (global o store view) y en *Applied Theme* seleccionar **InterR Custom Theme**.
4. Guardar y, si el sitio está en producción, volver a desplegar los estáticos:
   ```bash
   php bin/magento setup:static-content:deploy -f es_CO en_US
   php bin/magento cache:flush
   ```

En modo desarrollo el último paso normalmente no es necesario, porque Magento compila el LESS al vuelo.


## Separación en dos módulos

Decidí separar HelloWorld y DescripcionCustom porque no tienen relación funcional. HelloWorld es de demostración y normalmente se elimina, mientras que el override de la descripción es una personalización real. Así se puede deshabilitar uno sin afectar el otro, y cada `module.xml` declara solo lo que necesita.

## Pruebas manuales

- [x] `/helloworld/index/index` muestra el texto esperado.
- [x] En el detalle de producto aparece el texto adicional debajo de la descripción.
- [x] El logo cambia con el tema activo.
- [x] El título del producto se ve en rojo en la página de detalle.

## Notas

- Probado en Magento 2.4.7-p10 con PHP 8.4 
- Las secciones 1 y 3 de la prueba están en el PDF entregado.
