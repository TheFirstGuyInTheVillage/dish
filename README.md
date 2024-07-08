# Dish Builder

## Installation
1. Prepare `.env` and `docker-compose.override.yml` files (remove `.example` postfix). Change the parameters if necessary.
2. Run command `make build`
## Usage

### Dish builder command

```
bin/console app:dish:build {typesOrder}
```
* **typesOrder** - порядок кодов ингредиентов
#### Command example from task
```
make dish
```