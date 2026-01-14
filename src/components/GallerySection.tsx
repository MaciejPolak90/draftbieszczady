import { useState } from "react";
import { X, Camera } from "lucide-react";

import livingRoom from "@/assets/living-room-fireplace.jpg";
import kitchen from "@/assets/kitchen.jpg";
import bedroom from "@/assets/bedroom.jpg";
import bathroom from "@/assets/bathroom.jpg";
import gazebo from "@/assets/gazebo-dog.jpg";
import landscape from "@/assets/bieszczady-landscape.jpg";
import exterior from "@/assets/house-exterior.jpg";

type GalleryCategory = "all" | "salon" | "kuchnia" | "pokoje" | "lazienki" | "altana" | "okolica" | "taras";

interface GalleryImage {
  src: string;
  alt: string;
  caption: string;
  category: GalleryCategory[];
}

const images: GalleryImage[] = [
  {
    src: livingRoom,
    alt: "Salon z kominkiem",
    caption: "Kominek i przestronny salon",
    category: ["all", "salon"],
  },
  {
    src: kitchen,
    alt: "Kuchnia",
    caption: "W pełni wyposażona kuchnia ze zmywarką",
    category: ["all", "kuchnia"],
  },
  {
    src: bedroom,
    alt: "Sypialnia na poddaszu",
    caption: "Przytulna sypialnia z drewnianym sufitem",
    category: ["all", "pokoje"],
  },
  {
    src: bathroom,
    alt: "Łazienka z prysznicem",
    caption: "Łazienka z prysznicem",
    category: ["all", "lazienki"],
  },
  {
    src: gazebo,
    alt: "Altana z grillem",
    caption: "Altana z rusztem do grillowania",
    category: ["all", "altana"],
  },
  {
    src: exterior,
    alt: "Dom z zewnątrz",
    caption: "Widok domu z ogrodem",
    category: ["all", "okolica"],
  },
  {
    src: landscape,
    alt: "Widoki Bieszczad",
    caption: "Malownicze widoki Bieszczad",
    category: ["all", "okolica"],
  },
];

const categories: { key: GalleryCategory; label: string }[] = [
  { key: "all", label: "Wszystko" },
  { key: "salon", label: "Salon i kominek" },
  { key: "kuchnia", label: "Kuchnia" },
  { key: "pokoje", label: "Pokoje" },
  { key: "lazienki", label: "Łazienki" },
  { key: "altana", label: "Altana i grill" },
  { key: "okolica", label: "Okolica i szlaki" },
  { key: "taras", label: "Taras (wkrótce)" },
];

export function GallerySection() {
  const [activeCategory, setActiveCategory] = useState<GalleryCategory>("all");
  const [lightboxImage, setLightboxImage] = useState<GalleryImage | null>(null);

  const filteredImages = activeCategory === "all" 
    ? images 
    : images.filter((img) => img.category.includes(activeCategory));

  return (
    <section id="galeria" className="section-padding bg-cream">
      <div className="container-narrow mx-auto">
        <div className="text-center mb-8">
          <h2 className="font-display text-3xl md:text-4xl text-foreground mb-4">
            Galeria
          </h2>
          <p className="text-muted-foreground text-lg max-w-2xl mx-auto">
            Zobacz jak wygląda nasz dom — przytulne wnętrza i piękna okolica
          </p>
        </div>

        {/* Filters */}
        <div className="flex flex-wrap justify-center gap-2 mb-8">
          {categories.map((cat) => (
            <button
              key={cat.key}
              onClick={() => setActiveCategory(cat.key)}
              className={`px-4 py-2 rounded-full text-sm font-medium transition-all ${
                activeCategory === cat.key
                  ? "bg-primary text-primary-foreground shadow-soft"
                  : "bg-card text-muted-foreground hover:bg-secondary hover:text-foreground"
              }`}
            >
              {cat.label}
            </button>
          ))}
        </div>

        {/* Gallery Grid */}
        {activeCategory === "taras" ? (
          <div className="card-warm p-12 text-center">
            <Camera className="w-16 h-16 text-muted-foreground/30 mx-auto mb-4" />
            <h3 className="font-display text-xl text-foreground mb-2">
              Duży taras — zdjęcia wkrótce
            </h3>
            <p className="text-muted-foreground">
              Aktualizujemy galerię. Wkrótce dodamy zdjęcia przestronnego tarasu.
            </p>
          </div>
        ) : (
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            {filteredImages.map((image, index) => (
              <button
                key={index}
                onClick={() => setLightboxImage(image)}
                className="group relative aspect-[4/3] overflow-hidden rounded-2xl card-warm cursor-pointer"
              >
                <img
                  src={image.src}
                  alt={image.alt}
                  className="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-foreground/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300" />
                <div className="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                  <p className="text-primary-foreground text-sm font-medium">
                    {image.caption}
                  </p>
                </div>
              </button>
            ))}
          </div>
        )}

        {/* Lightbox */}
        {lightboxImage && (
          <div 
            className="fixed inset-0 z-[100] bg-foreground/95 flex items-center justify-center p-4"
            onClick={() => setLightboxImage(null)}
          >
            <button
              onClick={() => setLightboxImage(null)}
              className="absolute top-4 right-4 p-2 text-primary-foreground hover:text-primary transition-colors"
            >
              <X className="w-8 h-8" />
            </button>
            <div className="max-w-5xl max-h-[90vh] relative" onClick={(e) => e.stopPropagation()}>
              <img
                src={lightboxImage.src}
                alt={lightboxImage.alt}
                className="max-w-full max-h-[85vh] object-contain rounded-lg"
              />
              <p className="text-center text-primary-foreground/80 mt-4 text-lg">
                {lightboxImage.caption}
              </p>
            </div>
          </div>
        )}
      </div>
    </section>
  );
}
