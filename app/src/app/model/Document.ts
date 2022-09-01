import { Classe } from "./Classe";
import { Cours } from "./Cours";
import { User } from "./User";

export class Document{
  id: number | undefined;
  name: string | undefined;
  description: string | undefined;
  created_at: string | undefined;
  classe: Classe = Object.create(null);
  cours: Cours = Object.create(null);
  user: User = Object.create(null);
}
