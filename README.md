# Terminable

## Permasalahan
Kalo misalkan udah tau apa itu konsep daripada middleware, yaa terminable adalah bagian daripada itu. cuman mungkin kita sebagai developer ingin tahu caranya bagaimana untuk membuat perform sebuah aksi pada ujung proses siklus request setelah hasil response diterima oleh klien. ya pada saat itulah mengapa kita butuh terminable.

## Kegunaan Terminable
Terminable Middleware sangat berguna untuk tugas seperti logging, manajemen cache atau tugas pembersihan lain yang perlu dilakukan setelah respon dikirim

## Konsep Dasar
<img src="https://github.com/GarapDigital/terminable/blob/2bebb041adeb11e87c1b0a0c5cc11ca09f93f649/terminable_1.JPG" width="700" alt="Terminable Image">

- M = Model
- V = View
- C = Controller
- R = Route
- DB = Database
- Req = Request
- Res = Response
- GM = Global Middleware
- RM = Route Middleware
- T = Terminable

```bash
Request => Global Middleware => Route => Route Middleware => Controller

Peran Middleware dalam proses ini disebut Before Processing Action
```

```bash
Controller => Route Middleware => Global Middleware => Response

Peran Middleware dalam proses ini disebut After Processing Action
```

## Contributor
- [Wirandra Alaya](https://github.com/dayCod)
