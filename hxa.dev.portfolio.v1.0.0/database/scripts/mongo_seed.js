/**
 * ============================================================
 * MongoDB Seed Script - hxa.dev Portfolio v1.0.0
 * Database: web_hexa
 * ============================================================
 *
 * USAGE:
 *   mongosh "mongodb+srv://<username>:<password>@<host>/web_hexa" mongo_seed.js
 *
 *   Or for local MongoDB:
 *   mongosh "mongodb://localhost:27017/web_hexa" mongo_seed.js
 *
 * WARNING: This script drops existing collections before seeding.
 * ============================================================
 */

// Switch to the target database
db = db.getSiblingDB("web_hexa");

// ============================================================
// DROP EXISTING COLLECTIONS
// ============================================================
const collections = [
    "menu", "menu_translations",
    "service", "service_translations",
    "phrase", "phrase_translations",
    "project", "project_translations",
    "project_detail", "project_detail_translations"
];

collections.forEach(function(col) {
    if (db.getCollectionNames().indexOf(col) !== -1) {
        db[col].drop();
        print("Dropped collection: " + col);
    }
});

print("\n--- Starting seed process ---\n");

// ============================================================
// 1. MENU COLLECTION
// ============================================================
print("Seeding: menu & menu_translations...");

const menuItems = [
    { link: "hero",      icon: "fas fa-home",         function: "scrollTo" },
    { link: "aboutMe",   icon: "fas fa-user",         function: "scrollTo" },
    { link: "phrase",    icon: "fas fa-quote-left",   function: "scrollTo" },
    { link: "portfolio", icon: "fas fa-tasks",        function: "scrollTo" },
    { link: "contact",   icon: "fas fa-address-book", function: "scrollTo" },
    { link: "footer",   icon: "fas fa-info-circle",  function: "scrollTo" }
];

const menuTranslations = {
    hero:      { es: "Inicio",     en: "Home" },
    aboutMe:   { es: "Sobre Mi",   en: "About Me" },
    phrase:    { es: "Frase",      en: "Phrase" },
    portfolio: { es: "Portafolio", en: "Portfolio" },
    contact:   { es: "Contacto",   en: "Contact" },
    footer:   { es: "Info",       en: "Info" }
};

menuItems.forEach(function(item) {
    const result = db.menu.insertOne({
        link: item.link,
        icon: item.icon,
        "function": item.function,
        created_at: new Date(),
        updated_at: new Date()
    });

    const menuId = result.insertedId.toString();
    const translations = menuTranslations[item.link];

    Object.keys(translations).forEach(function(locale) {
        db.menu_translations.insertOne({
            menu_id: menuId,
            locale: locale,
            name: translations[locale],
            created_at: new Date(),
            updated_at: new Date()
        });
    });
});

print("  -> " + db.menu.countDocuments() + " menu items created");
print("  -> " + db.menu_translations.countDocuments() + " menu translations created");

// ============================================================
// 2. SERVICE COLLECTION
// ============================================================
print("\nSeeding: service & service_translations...");

const services = [
    {
        icons: ["fas fa-laptop-code", "fas fa-globe"],
        translations: {
            es: {
                title: "Desarrollo Web",
                content: "Desarrollo de aplicaciones web modernas con tecnologias como Laravel, React, Vue.js, Node.js y bases de datos SQL/NoSQL. Enfocado en rendimiento, seguridad y experiencia de usuario."
            },
            en: {
                title: "Web Development",
                content: "Modern web application development with technologies like Laravel, React, Vue.js, Node.js and SQL/NoSQL databases. Focused on performance, security and user experience."
            }
        }
    },
    {
        icons: ["fas fa-mobile-alt", "fas fa-tablet-alt"],
        translations: {
            es: {
                title: "Desarrollo Movil",
                content: "Creacion de aplicaciones moviles nativas e hibridas para iOS y Android utilizando React Native y Flutter. Interfaces intuitivas y rendimiento optimo."
            },
            en: {
                title: "Mobile Development",
                content: "Native and hybrid mobile application development for iOS and Android using React Native and Flutter. Intuitive interfaces and optimal performance."
            }
        }
    },
    {
        icons: ["fas fa-server", "fas fa-database"],
        translations: {
            es: {
                title: "Backend & APIs",
                content: "Diseno e implementacion de APIs RESTful, microservicios y arquitecturas escalables. Experiencia con Laravel, Express.js, bases de datos relacionales y no relacionales."
            },
            en: {
                title: "Backend & APIs",
                content: "Design and implementation of RESTful APIs, microservices and scalable architectures. Experience with Laravel, Express.js, relational and non-relational databases."
            }
        }
    },
    {
        icons: ["fas fa-paint-brush", "fas fa-palette"],
        translations: {
            es: {
                title: "UI/UX Design",
                content: "Diseno de interfaces de usuario centradas en la experiencia del usuario. Prototipado, wireframing y diseno responsivo con enfoque en accesibilidad y usabilidad."
            },
            en: {
                title: "UI/UX Design",
                content: "User-centered interface design focused on user experience. Prototyping, wireframing and responsive design with focus on accessibility and usability."
            }
        }
    }
];

services.forEach(function(svc) {
    const result = db.service.insertOne({
        icons: svc.icons,
        created_at: new Date(),
        updated_at: new Date()
    });

    const serviceId = result.insertedId.toString();

    Object.keys(svc.translations).forEach(function(locale) {
        db.service_translations.insertOne({
            service_id: serviceId,
            locale: locale,
            title: svc.translations[locale].title,
            content: svc.translations[locale].content,
            created_at: new Date(),
            updated_at: new Date()
        });
    });
});

print("  -> " + db.service.countDocuments() + " services created");
print("  -> " + db.service_translations.countDocuments() + " service translations created");

// ============================================================
// 3. PHRASE COLLECTION
// ============================================================
print("\nSeeding: phrase & phrase_translations...");

const phrases = [
    {
        translations: {
            es: { content: "La unica forma de hacer un gran trabajo es amar lo que haces.",            author: "Steve Jobs" },
            en: { content: "The only way to do great work is to love what you do.",                    author: "Steve Jobs" }
        }
    },
    {
        translations: {
            es: { content: "Primero resuelve el problema, luego escribe el codigo.",                   author: "John Johnson" },
            en: { content: "First, solve the problem. Then, write the code.",                          author: "John Johnson" }
        }
    },
    {
        translations: {
            es: { content: "El codigo es como el humor. Cuando tienes que explicarlo, es malo.",        author: "Cory House" },
            en: { content: "Code is like humor. When you have to explain it, it's bad.",               author: "Cory House" }
        }
    },
    {
        translations: {
            es: { content: "La mejor manera de predecir el futuro es inventarlo.",                     author: "Alan Kay" },
            en: { content: "The best way to predict the future is to invent it.",                      author: "Alan Kay" }
        }
    },
    {
        translations: {
            es: { content: "La simplicidad es la maxima sofisticacion.",                               author: "Leonardo da Vinci" },
            en: { content: "Simplicity is the ultimate sophistication.",                               author: "Leonardo da Vinci" }
        }
    },
    {
        translations: {
            es: { content: "Hablar es barato. Muestrame el codigo.",                                  author: "Linus Torvalds" },
            en: { content: "Talk is cheap. Show me the code.",                                         author: "Linus Torvalds" }
        }
    }
];

phrases.forEach(function(phrase) {
    const result = db.phrase.insertOne({
        created_at: new Date(),
        updated_at: new Date()
    });

    const phraseId = result.insertedId.toString();

    Object.keys(phrase.translations).forEach(function(locale) {
        db.phrase_translations.insertOne({
            phrase_id: phraseId,
            locale: locale,
            content: phrase.translations[locale].content,
            author: phrase.translations[locale].author,
            created_at: new Date(),
            updated_at: new Date()
        });
    });
});

print("  -> " + db.phrase.countDocuments() + " phrases created");
print("  -> " + db.phrase_translations.countDocuments() + " phrase translations created");

// ============================================================
// 4. PROJECT DETAIL COLLECTION
// ============================================================
print("\nSeeding: project_detail & project_detail_translations...");

const projectDetails = [
    {
        icons_techs: ["devicon-laravel-plain", "devicon-php-plain", "devicon-mongodb-plain", "devicon-javascript-plain", "devicon-bootstrap-plain"],
        translations: {
            es: {
                description: "Portafolio personal desarrollado con Laravel y MongoDB como primera version profesional. Incluye sistema de temas dinamicos, soporte multilenguaje y animaciones interactivas.",
                requirements: "Mostrar proyectos, servicios y experiencia profesional de forma atractiva. Soporte para multiples idiomas y temas personalizables.",
                overview: "Sitio web de portafolio personal con arquitectura MVC, base de datos NoSQL y frontend interactivo con efectos de particulas y carruseles.",
                challenge: "Implementar un sistema de traducciones con MongoDB y Laravel, crear un panel de configuracion de temas en tiempo real con persistencia en cookies.",
                solution: "Se utilizo el paquete Astrotomic Translatable adaptado para MongoDB con Jenssegers, sistema de cookies para persistencia de temas y Particles.js para efectos visuales."
            },
            en: {
                description: "Personal portfolio developed with Laravel and MongoDB as the first professional version. Includes dynamic theme system, multilanguage support and interactive animations.",
                requirements: "Display projects, services and professional experience in an attractive way. Support for multiple languages and customizable themes.",
                overview: "Personal portfolio website with MVC architecture, NoSQL database and interactive frontend with particle effects and carousels.",
                challenge: "Implement a translation system with MongoDB and Laravel, create a real-time theme configuration panel with cookie persistence.",
                solution: "Used the Astrotomic Translatable package adapted for MongoDB with Jenssegers, cookie system for theme persistence and Particles.js for visual effects."
            }
        }
    },
    {
        icons_techs: ["devicon-react-original", "devicon-nodejs-plain", "devicon-mongodb-plain", "devicon-express-original"],
        translations: {
            es: {
                description: "Aplicacion web de gestion de tareas con funcionalidades de tiempo real. Permite crear, organizar y colaborar en proyectos con multiples usuarios.",
                requirements: "Sistema de autenticacion, CRUD de tareas, notificaciones en tiempo real, tablero tipo Kanban con drag and drop.",
                overview: "Aplicacion full-stack con React en el frontend y Node.js/Express en el backend, utilizando MongoDB como base de datos y Socket.io para tiempo real.",
                challenge: "Sincronizar el estado de las tareas entre multiples usuarios conectados simultaneamente y manejar conflictos de edicion.",
                solution: "Se implemento WebSockets con Socket.io para comunicacion bidireccional y un sistema de versionado optimista para resolver conflictos."
            },
            en: {
                description: "Task management web application with real-time features. Allows creating, organizing and collaborating on projects with multiple users.",
                requirements: "Authentication system, task CRUD, real-time notifications, Kanban-style board with drag and drop.",
                overview: "Full-stack application with React on the frontend and Node.js/Express on the backend, using MongoDB as database and Socket.io for real-time.",
                challenge: "Synchronizing task state between multiple simultaneously connected users and handling editing conflicts.",
                solution: "Implemented WebSockets with Socket.io for bidirectional communication and an optimistic versioning system to resolve conflicts."
            }
        }
    },
    {
        icons_techs: ["devicon-android-plain", "devicon-kotlin-plain", "devicon-firebase-plain"],
        translations: {
            es: {
                description: "Aplicacion movil Android para el seguimiento de habitos diarios con gamificacion. Los usuarios ganan puntos y desbloquean logros al completar sus habitos.",
                requirements: "Registro de habitos, recordatorios push, estadisticas de progreso, sistema de puntos y logros, sincronizacion en la nube.",
                overview: "App nativa Android desarrollada en Kotlin con arquitectura MVVM, Firebase para backend y Material Design para la interfaz.",
                challenge: "Disenar un sistema de gamificacion motivador que mantenga el engagement del usuario a largo plazo sin ser intrusivo.",
                solution: "Se creo un sistema de recompensas progresivo con rachas diarias, niveles y logros desbloqueables que se adaptan al comportamiento del usuario."
            },
            en: {
                description: "Android mobile application for daily habit tracking with gamification. Users earn points and unlock achievements by completing their habits.",
                requirements: "Habit registration, push reminders, progress statistics, points and achievements system, cloud synchronization.",
                overview: "Native Android app developed in Kotlin with MVVM architecture, Firebase for backend and Material Design for the interface.",
                challenge: "Design a motivating gamification system that maintains long-term user engagement without being intrusive.",
                solution: "Created a progressive reward system with daily streaks, levels and unlockable achievements that adapt to user behavior."
            }
        }
    }
];

const detailIds = [];
projectDetails.forEach(function(detail) {
    const result = db.project_detail.insertOne({
        icons_techs: detail.icons_techs,
        created_at: new Date(),
        updated_at: new Date()
    });

    const detailId = result.insertedId.toString();
    detailIds.push(detailId);

    Object.keys(detail.translations).forEach(function(locale) {
        db.project_detail_translations.insertOne({
            project_detail_id: detailId,
            locale: locale,
            description: detail.translations[locale].description,
            requirements: detail.translations[locale].requirements,
            overview: detail.translations[locale].overview,
            challenge: detail.translations[locale].challenge,
            solution: detail.translations[locale].solution,
            created_at: new Date(),
            updated_at: new Date()
        });
    });
});

print("  -> " + db.project_detail.countDocuments() + " project details created");
print("  -> " + db.project_detail_translations.countDocuments() + " project detail translations created");

// ============================================================
// 5. PROJECT COLLECTION
// ============================================================
print("\nSeeding: project & project_translations...");

const projects = [
    {
        image: "",  // Base64 image string - replace with actual project screenshot
        icons_type: ["fas fa-laptop-code", "fas fa-globe"],
        date: "2021",
        active: true,
        project_detail_id: detailIds[0],
        translations: {
            es: { name: "hxa.dev Portfolio",       type: "Sitio Web" },
            en: { name: "hxa.dev Portfolio",       type: "Website" }
        }
    },
    {
        image: "",  // Base64 image string - replace with actual project screenshot
        icons_type: ["fas fa-laptop-code", "fas fa-tasks"],
        date: "2022",
        active: true,
        project_detail_id: detailIds[1],
        translations: {
            es: { name: "TaskFlow App",            type: "Aplicacion Web" },
            en: { name: "TaskFlow App",            type: "Web Application" }
        }
    },
    {
        image: "",  // Base64 image string - replace with actual project screenshot
        icons_type: ["fas fa-mobile-alt"],
        date: "2023",
        active: true,
        project_detail_id: detailIds[2],
        translations: {
            es: { name: "HabitQuest",              type: "App Movil" },
            en: { name: "HabitQuest",              type: "Mobile App" }
        }
    }
];

projects.forEach(function(proj) {
    const result = db.project.insertOne({
        image: proj.image,
        icons_type: proj.icons_type,
        date: proj.date,
        active: proj.active,
        project_detail_id: proj.project_detail_id,
        created_at: new Date(),
        updated_at: new Date()
    });

    const projectId = result.insertedId.toString();

    Object.keys(proj.translations).forEach(function(locale) {
        db.project_translations.insertOne({
            project_id: projectId,
            locale: locale,
            name: proj.translations[locale].name,
            type: proj.translations[locale].type,
            created_at: new Date(),
            updated_at: new Date()
        });
    });
});

print("  -> " + db.project.countDocuments() + " projects created");
print("  -> " + db.project_translations.countDocuments() + " project translations created");

// ============================================================
// CREATE INDEXES
// ============================================================
print("\n--- Creating indexes ---\n");

db.menu_translations.createIndex({ menu_id: 1, locale: 1 }, { unique: true });
db.service_translations.createIndex({ service_id: 1, locale: 1 }, { unique: true });
db.phrase_translations.createIndex({ phrase_id: 1, locale: 1 }, { unique: true });
db.project_translations.createIndex({ project_id: 1, locale: 1 }, { unique: true });
db.project_detail_translations.createIndex({ project_detail_id: 1, locale: 1 }, { unique: true });

print("Indexes created successfully.");

// ============================================================
// VERIFICATION
// ============================================================
print("\n--- Seed Verification ---\n");

const counts = {};
collections.forEach(function(col) {
    counts[col] = db[col].countDocuments();
    print("  " + col + ": " + counts[col] + " documents");
});

const totalDocs = Object.values(counts).reduce(function(a, b) { return a + b; }, 0);
print("\n  TOTAL: " + totalDocs + " documents across " + collections.length + " collections");
print("\n--- Seed completed successfully! ---\n");
