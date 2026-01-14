import { Home, Bath, Flame, TreePine, Wifi, Car } from "lucide-react";

const features = [
  {
    icon: Home,
    title: "Dom na wyłączność",
    description: "Cała połówka bliźniaka tylko dla Twojej rodziny",
  },
  {
    icon: Bath,
    title: "2 łazienki",
    description: "Dwie pełne łazienki z prysznicem i ogrzewaniem",
  },
  {
    icon: Flame,
    title: "Kominek",
    description: "Przytulne wieczory przy ogniu w przestronnym salonie",
  },
  {
    icon: TreePine,
    title: "Altana + grill",
    description: "Duża wiata z rusztem do grillowania na świeżym powietrzu",
  },
  {
    icon: Wifi,
    title: "Wi-Fi",
    description: "Bezprzewodowy internet w cenie pobytu",
  },
  {
    icon: Car,
    title: "Parking",
    description: "Prywatne miejsce parkingowe przy domu",
  },
];

export function FeaturesSection() {
  return (
    <section id="udogodnienia" className="section-padding bg-cream">
      <div className="container-narrow mx-auto">
        <div className="text-center mb-12">
          <h2 className="font-display text-3xl md:text-4xl text-foreground mb-4">
            Najważniejsze dla rodziny
          </h2>
          <p className="text-muted-foreground text-lg max-w-2xl mx-auto">
            Wszystko, czego potrzebujesz na rodzinny wypoczynek w górach
          </p>
        </div>

        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          {features.map((feature, index) => (
            <div
              key={feature.title}
              className="card-warm p-6 hover:shadow-elevated transition-all duration-300 hover:-translate-y-1"
              style={{ animationDelay: `${index * 0.1}s` }}
            >
              <div className="w-12 h-12 rounded-xl bg-primary/10 flex items-center justify-center mb-4">
                <feature.icon className="w-6 h-6 text-primary" />
              </div>
              <h3 className="font-display text-xl text-foreground mb-2">
                {feature.title}
              </h3>
              <p className="text-muted-foreground">
                {feature.description}
              </p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
