import { PawPrint, Heart } from "lucide-react";
import dogImage from "@/assets/gazebo-dog.jpg";

export function PetsSection() {
  return (
    <section className="section-padding">
      <div className="container-narrow mx-auto">
        <div className="card-warm overflow-hidden">
          <div className="grid md:grid-cols-2 gap-0">
            <div className="relative aspect-[4/3] md:aspect-auto">
              <img
                src={dogImage}
                alt="Pies w altanie"
                className="w-full h-full object-cover"
              />
            </div>
            <div className="p-8 md:p-12 flex flex-col justify-center">
              <div className="flex items-center gap-3 mb-4">
                <div className="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center">
                  <PawPrint className="w-6 h-6 text-primary" />
                </div>
                <Heart className="w-5 h-5 text-destructive" />
              </div>
              <h2 className="font-display text-2xl md:text-3xl text-foreground mb-4">
                Zwierzęta mile widziane
              </h2>
              <p className="text-lg text-muted-foreground mb-4">
                Przyjedź z pupilem — zwierzęta mile widziane 🐾
              </p>
              <p className="text-muted-foreground">
                Rozumiemy, że zwierzak to członek rodziny. U nas Twój pupil może cieszyć się 
                przestrzenią ogrodu i wspólnymi spacerami po bieszczadzkich szlakach.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
