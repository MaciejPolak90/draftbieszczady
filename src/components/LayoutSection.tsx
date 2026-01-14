import { BedDouble, Sofa, ChefHat, Bath, TreePine } from "lucide-react";

const rooms = [
  {
    icon: BedDouble,
    title: "Piętro",
    items: [
      "Pokój 3-osobowy: 1 łóżko podwójne + 1 pojedyncze",
      "Pokój 2-osobowy: 1 łóżko podwójne",
      "Drewniany sufit i widok na świerki",
    ],
  },
  {
    icon: Sofa,
    title: "Parter",
    items: [
      "Duży salon z kominkiem i TV",
      "Narożnik rozkładany dla 2 osób",
      "Jadalnia przy kuchni",
    ],
  },
  {
    icon: ChefHat,
    title: "Kuchnia",
    items: [
      "W pełni wyposażona kuchnia",
      "Zmywarka i pralka",
      "Piekarnik, płyta gazowa, mikrofalówka",
    ],
  },
  {
    icon: Bath,
    title: "Łazienki",
    items: [
      "2 pełne łazienki z prysznicem",
      "Ogrzewanie podłogowe",
      "Ręczniki i środki czystości",
    ],
  },
  {
    icon: TreePine,
    title: "Na zewnątrz",
    items: [
      "Duża altana z rusztem do grillowania",
      "Taras (zdjęcia wkrótce)",
      "Parking przy domu",
    ],
  },
];

export function LayoutSection() {
  return (
    <section className="section-padding">
      <div className="container-narrow mx-auto">
        <div className="text-center mb-12">
          <h2 className="font-display text-3xl md:text-4xl text-foreground mb-4">
            Układ domu i wyposażenie
          </h2>
          <p className="text-muted-foreground text-lg max-w-2xl mx-auto">
            Przestronne wnętrza na dwóch poziomach — idealne dla rodziny
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {rooms.map((room, index) => (
            <div
              key={room.title}
              className={`card-warm p-6 ${
                index === rooms.length - 1 && rooms.length % 3 !== 0
                  ? "md:col-span-2 lg:col-span-1"
                  : ""
              }`}
            >
              <div className="flex items-center gap-3 mb-4">
                <div className="w-10 h-10 rounded-lg bg-secondary flex items-center justify-center">
                  <room.icon className="w-5 h-5 text-wood" />
                </div>
                <h3 className="font-display text-xl text-foreground">
                  {room.title}
                </h3>
              </div>
              <ul className="space-y-2">
                {room.items.map((item) => (
                  <li key={item} className="flex items-start gap-2 text-muted-foreground">
                    <span className="w-1.5 h-1.5 rounded-full bg-primary mt-2 shrink-0" />
                    {item}
                  </li>
                ))}
              </ul>
            </div>
          ))}
        </div>

        <div className="mt-8 p-4 bg-secondary/50 rounded-xl text-center">
          <p className="text-muted-foreground">
            <strong className="text-foreground">Pojemność:</strong> do 5 osób (+ 2 na narożniku w salonie)
          </p>
        </div>
      </div>
    </section>
  );
}
